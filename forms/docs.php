<?php

    //Delete media
    if(isset($_GET['deleteMedia'])):
        // echo 'Deleting media';

        $media = $_GET['deleteMedia'];
        
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.nexusmls.io/Media('$media')",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $mlsApiKey"
            ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
        }
    endif;


    //Uplaod Media
    if(isset($_POST['Media']) && is_array($_POST['Media'])) {
        // echo 'Uplaoding media';

        foreach($_POST['Media'] as $url) {

            curl_setopt_array($curl, [
              CURLOPT_URL => "https://api.nexusmls.io/Media",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode([
                'ResourceRecordKey' => $listing,
                'MediaURL' => $url,
                'ImageOf' => 'Attic'
              ]),
              CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $mlsApiKey",
                "Content-Type: application/json"
              ],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            }

        }
        echo '<p style="color: green;">Media Uploaded<p>';
    }


    // Get media links
    // echo 'Geting existing media links';

    // Encode the listing parameter for safe URL usage
    $listing = urlencode($listing);

    // Build the URL with properly encoded query parameters
    $url = "https://api.nexusmls.io/Media?" . http_build_query([
        '$filter' => "ResourceRecordKey eq '$listing'",
        '$select' => 'MediaKey,MediaURL'
    ]);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $mlsApiKey"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response, true);

        $oldMediaItems = $data['value'];

        // echo '<pre>';
        //     var_dump($oldMediaItems);
        // echo '</pre>';
    }

    // Filter out image files from $oldMediaItems (opposite of what was done before)
    $filteredMediaItems = array_filter($oldMediaItems, function($item) {
        // Get the file extension from the URL
        $fileExtension = strtolower(pathinfo($item['MediaURL'], PATHINFO_EXTENSION));
        
        // List of common image extensions
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'];
        
        // Check if the file extension is NOT in our list of image extensions
        return !in_array($fileExtension, $imageExtensions);
    });

    // Reset array keys to maintain sequential indexing
    $oldFiles = array_values($filteredMediaItems);

?>

<h2>Documents & Files</h2>

<div class="media-items">
    <?php foreach($oldFiles as $item): ?>
        <div class="media-item">
            <?php 
            $fileExtension = strtolower(pathinfo($item['MediaURL'], PATHINFO_EXTENSION));
            $fileName = basename($item['MediaURL']);
            ?>
            <div class="file-icon">
                <span class="file-extension"><?php echo strtoupper($fileExtension); ?></span>
                <span class="file-name"><?php echo $fileName; ?></span>
            </div>
            <a type="button" class="remove-image" href="?tab=all-listings&listing=<?php echo $listing; ?>&deleteMedia=<?php echo $item['MediaKey'] ?>">Remove</a>
        </div>
    <?php endforeach; ?>
</div>

<form method="POST" class="nexus-mls-form">
    <div class="upload-field">
        <label for="Media">Upload new</label>
        <!-- Accept all file types except images -->
        <input type="file" name="Media" id="mediaFiles" multiple required accept=".pdf,.doc,.docx,.xls,.xlsx,.txt,.csv,.ppt,.pptx,.zip,.rar">
        <div id="uploadPreview"></div>
    </div>
    <button type="submit">Upload Documents</button>
</form>

<script>
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
document.getElementById('mediaFiles').addEventListener('change', async function(e) {
    const files = e.target.files;
    const uploadPreview = document.getElementById('uploadPreview');
    const mediaUrls = window.mediaData || [];
    
    uploadPreview.innerHTML = 'Validating files...';
    
    // Check for image files
    const invalidFiles = [];
    const validFiles = [];
    
    for(let file of files) {
        // Check if file is an image
        if(file.type.startsWith('image/')) {
            invalidFiles.push(file.name);
        } else if(file.size > 10 * 1024 * 1024) { // 10MB limit
            invalidFiles.push(file.name + ' (too large, max 10MB)');
        } else {
            validFiles.push(file);
        }
    }
    
    // Alert if any invalid files were selected
    if(invalidFiles.length > 0) {
        alert('The following files cannot be uploaded:\n' + invalidFiles.join('\n') + 
              '\n\nPlease select only document files (no images).');
        if(validFiles.length === 0) {
            uploadPreview.innerHTML = '';
            return;
        }
    }
    
    if(validFiles.length === 0) {
        uploadPreview.innerHTML = '';
        return;
    }
    
    uploadPreview.innerHTML = 'Uploading...';
    
    for(let file of validFiles) {
        const formData = new FormData();
        formData.append('file', file);
        formData.append('action', 'upload_media');
        formData.append('nonce', '<?php echo wp_create_nonce("media-upload"); ?>');
        
        try {
            const response = await fetch(ajaxurl, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });
            
            const data = await response.json();
            
            if(data.success && data.data?.url) {
                mediaUrls.push(data.data.url);
                
                // Update preview
                renderPreview(mediaUrls);
                
                window.mediaData = mediaUrls;
            }
        } catch(error) {
            console.error('Upload failed:', error);
        }
    }
});

function renderPreview(urls) {
    const uploadPreview = document.getElementById('uploadPreview');
    
    uploadPreview.innerHTML = urls.map((url, index) => {
        const fileExtension = url.split('.').pop().toLowerCase();
        const fileName = url.split('/').pop();
        
        return `
            <div class="preview-item">
                <input type="checkbox" 
                       name="Media[]" 
                       value="${url}" 
                       id="media_${index}"
                       checked>
                <label for="media_${index}">
                    <div class="file-icon">
                        <span class="file-extension">${fileExtension.toUpperCase()}</span>
                        <span class="file-name">${fileName}</span>
                    </div>
                </label>
                <button type="button" class="remove-image" data-url="${url}">Remove</button>
            </div>
        `;
    }).join('');
}

document.getElementById('uploadPreview').addEventListener('click', function(e) {
    if(e.target.classList.contains('remove-image')) {
        const url = e.target.dataset.url;
        window.mediaData = window.mediaData.filter(item => item !== url);
        renderPreview(window.mediaData);
    }
});
</script>


<style>
.media-items {
    display: flex;
    flex-direction: column;
}

.media-item {
    border: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    margin: 10px 0;
}

.media-item a{
    background: red;
    color: white;
    padding: 5px 10px;
    text-decoration: none;
}

.file-icon {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: 100px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.file-extension {
    font-weight: bold;
    font-size: 18px;
    color: #444;
}

.file-name {
    font-size: 12px;
    margin-top: 5px;
    max-width: 90px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    text-align: center;
}

.preview-item {
    display: flex;
    align-items: center;
    margin: 10px 0;
    padding: 10px;
    border: 1px solid #ddd;
}

.preview-item input[type="checkbox"] {
    display: none;
}

.preview-item .file-icon {
    margin: 0 10px;
}

.preview-item .remove-image {
    margin-left: auto;
    padding: 5px 10px;
    background: #ff4444;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.upload-field {
    margin: 20px 0;
}

.upload-field label {
    display: block;
    margin-bottom: 10px;
}

.upload-field small {
    display: block;
    margin-bottom: 10px;
    color: #666;
}

#mediaFiles {
    margin-bottom: 15px;
}
</style>
