<?php

    //Delete media
    if(isset($_GET['deleteMedia'])):
        // echo 'Deleting media';

        $curl = curl_init();

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

    // Filter out non-image files from $oldMediaItems
    $filteredMediaItems = array_filter($oldMediaItems, function($item) {
        // Get the file extension from the URL
        $fileExtension = strtolower(pathinfo($item['MediaURL'], PATHINFO_EXTENSION));
        
        // List of common image extensions
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'];
        
        // Check if the file extension is in our list of image extensions
        return in_array($fileExtension, $imageExtensions);
    });

    // Reset array keys to maintain sequential indexing
    $oldImages = array_values($filteredMediaItems);


?>

<h2>Photos</h2>

<div class="media-items">
    <?php foreach($oldImages as $item): ?>
        <div class="media-item">
            <img src="<?php echo $item['MediaURL'] ?>" width="100" alt="Preview">
            <a type="button" class="remove-image" href="?tab=all-listings&listing=<?php echo $listing; ?>&deleteMedia=<?php echo $item['MediaKey'] ?>">Remove</a>
        </div>
    <?php endforeach; ?>
</div>

<form method="POST" class="nexus-mls-form">
    <div class="upload-field">
        <label for="Media">Upload new</label>
        <input type="file" name="Media" id="mediaFiles" multiple accept="image/*" required>
        <div id="uploadPreview"></div>
    </div>
    <button type="submit">Upload Photos</button>
</form>

<script>
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
document.getElementById('mediaFiles').addEventListener('change', async function(e) {
    const files = e.target.files;
    const uploadPreview = document.getElementById('uploadPreview');
    const mediaUrls = window.mediaData || [];
    
    uploadPreview.innerHTML = 'Uploading...';
    
    for(let file of files) {
        if(!file.type.startsWith('image/') || file.size > 5 * 1024 * 1024) {
            continue;
        }
        
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
                
                uploadPreview.innerHTML = mediaUrls.map((url, index) => `
                    <div class="preview-item">
                        <input type="checkbox" 
                               name="Media[]" 
                               value="${url}" 
                               id="media_${index}"
                               checked>
                        <label for="media_${index}">
                            <img src="${url}" width="100" alt="Preview">
                        </label>
                        <button type="button" class="remove-image" data-url="${url}">Remove</button>
                    </div>
                `).join('');
                
                window.mediaData = mediaUrls;
            }
        } catch(error) {
            console.error('Upload failed:', error);
        }
    }
});

document.getElementById('uploadPreview').addEventListener('click', function(e) {
    if(e.target.classList.contains('remove-image')) {
        const url = e.target.dataset.url;
        window.mediaData = window.mediaData.filter(item => item !== url);
        e.target.closest('.preview-item').remove();
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

.preview-item img {
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

#mediaFiles {
    margin-bottom: 15px;
}
</style>