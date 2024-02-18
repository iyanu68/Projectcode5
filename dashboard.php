<?php
include 'head.php';
?>


<style>
    /* Add your custom styling for the video here */
    #video-container video {
        max-width: 20%; /* Adjust the maximum width as needed */
        height: auto;
        margin-left:20em;
        margin-top: 1.5em;
    }
</style>

<body style="background: rgba(192, 247, 231, 0.813); margin-bottom:2em;">

    <label class="logo" style="margin-top: 3em; margin-left: 20em; margin-bottom: 2em; font-family: protest riot; font-size: 1.7em;">
        <strong>Vidcom</strong>
    </label>
    <a href="logout.php" style="font-size: 1em; margin-left: 1em; margin-left: 25em;">Logout</a>

    <div id="studio-section">
        
        <h3 style = "text-align:center; color:rgba(39, 93, 132, 0.813);"> Studio </h3>
        <p style = "text-align:center;">Maximum video upload: 2MB</p>

        <form id="uploadForm" enctype="multipart/form-data">
            <label for="video" style = "margin-left:20em; font-weight:bold"> Upload Videos: </label>
            <input type="file" class="form-control" style = "width:50%; margin-left:20em;" name="video" accept="video/*" />
            <button type="button" class="btn btn-success" onclick="uploadVideo()" style = "margin-left:20em; margin-top:1em;"> Upload </button>
        </form>

        <div id="video-container"></div>
        <!-- Displayed when video is available -->
        <div id="viewButton" style="display: none;">
            <button type="button" class="btn btn-primary" onclick="showVideo()" style = "margin-left:20em;"> View Video </button>
            <span id="viewCount">0 views</span>
        </div>
    </div>

  

</body>
</html>

    <!-- Include jQuery if not included already -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Your existing JavaScript functions -->
    <script>
    var viewCount = 0; // Counter variable for views

    function uploadVideo() {
        var formData = new FormData($('#uploadForm')[0]);

        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Assuming the response contains the HTML video element
                $('#video-container').html(response);

                // Reset view count when a new video is uploaded
                viewCount = 0;

                // Show the view button
                $('#viewButton').show();
            },
            error: function(xhr, status, error) {
                alert('Error uploading video: ' + error);
            }
        });
    }

    // Function to manually play the video
    function playVideo() {
        // Assuming you have a video element with the ID 'uploadedVideo'
        var video = document.getElementById('uploadedVideo');

        // Play the video
        video.play();
    }

    // Function to show and increment view count
    function showVideo() {
        // Increment view count
        viewCount++;

        // Display the view count
        $('#viewCount').text(viewCount + ' views');

        // Delay hiding the view button for 1 second (1000 milliseconds)
        $('#viewButton').delay(500).fadeOut('fast');
    }
</script>