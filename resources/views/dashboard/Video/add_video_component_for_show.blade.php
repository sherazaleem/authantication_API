<div class="container">
    <form action='{{url("video_notes/added")}}' method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="video_note" class="form-control border-green-200" placeholder="Enter Video_note">
             @if(session()->has('message'))
                    <div class="alert alert-success text-white-200 bg-green-300 py-2 border border-blue-gray-300 text-center">
               {{ session()->get('message') }}
                </div>
                @endif
        <input type="submit" class="btn btn-primary" value="save">
    </form>
        <div class="row ">
          <div class="col-md-10 offset-md-1">
            <h2 class="text-center">Start Recording</h2>
           <video class="border border-gray-300 bg-dark" id="cameraPreview" width="900" height="900" autoplay></video>
           <p class="offset-md-4">
            <button class="btn btn-danger" id="startButton" onclick="startCapture();">Start Capture</button>
            <button class="btn btn-info" id="stopButton" onclick="stopCapture();">Stop Capture</button>
            
            <button class="btn btn-success" id="sendButton" onclick="sendRecorded();">Send</button>
            <!-- <button class="btn btn-primary" id="downloadButton">Download</button> -->
           </p>
          </div>
        </div>
    </div>

    <div class="hidden">
        <h2>Processing Preview</h2>
        <canvas id="processingPreview" width="240" height="180"></canvas>
    </div>

    <div class="container">
        <div class="row ">
          <div class="col-md-10 offset-md-1">
        <h2 class="text-center">Recording Preview</h2>
        <video id="recordingPreview" width="900" height="900" autoplay controls></video>
        <p>
            <a class="btn btn-primary offset-md-5" id="downloadButton">Download</a>
        </p>
      </div>
    </div>
    </div>

    <script>

    const ROI_X = 250;
    const ROI_Y = 150;
    const ROI_WIDTH = 240;
    const ROI_HEIGHT = 180;
    
    const FPS = 25;
    
    let cameraStream = null;
    let processingStream = null;
    let mediaRecorder = null;
    let mediaChunks = null;
    let processingPreviewIntervalId = null;

    let blob = null;

    function processFrame() {
        let cameraPreview = document.getElementById("cameraPreview");
        
        processingPreview
            .getContext('2d')
            .drawImage(cameraPreview, ROI_X, ROI_Y, ROI_WIDTH, ROI_HEIGHT, 0, 0, ROI_WIDTH, ROI_HEIGHT);
    }
    
    function generateRecordingPreview() {
        let mediaBlob = new Blob(mediaChunks, { type: "video/webm" });
        let mediaBlobUrl = URL.createObjectURL(mediaBlob);
        
        let recordingPreview = document.getElementById("recordingPreview");
        recordingPreview.src = mediaBlobUrl;

        let downloadButton = document.getElementById("downloadButton");
        downloadButton.href = mediaBlobUrl;
        downloadButton.download = "RecordedVideo.webm";

        var sendButton = document.getElementById("sendButton");

        blob = mediaBlob;

    }
        
    function startCapture() {
        const constraints = { video: true, audio: false };
        navigator.mediaDevices.getUserMedia(constraints)
        .then((stream) => {
            cameraStream = stream;
            
            let processingPreview = document.getElementById("processingPreview");
            processingStream = processingPreview.captureStream(FPS);
            
            mediaRecorder = new MediaRecorder(processingStream);
            mediaChunks = []
            
            mediaRecorder.ondataavailable = function(event) {
                mediaChunks.push(event.data);
                if(mediaRecorder.state == "inactive") {
                    generateRecordingPreview();
                }
            };
            
            mediaRecorder.start();
            
            let cameraPreview = document.getElementById("cameraPreview");
            cameraPreview.srcObject = stream;
        
            processingPreviewIntervalId = setInterval(processFrame, 1000 / FPS);
        })
        .catch((err) => {
            alert("No media device found!");
        });
    };
    

    async function sendRecorded(){
            if (blob != null) {
                let formData =new FormData();
                formData.append("video_note",blob, "abc.webm");
                await fetch('{{url("video_note/added")}}',
                    {
                        method: "POST" ,
                        body: formData ,
                        header:{

                            Authorization: 'Bearer 7|5XsyCWHIGxgf2placfJY0OLam3bosPGVK6vpad4q',
                            
                             }
                         
                    }
                       
                );
                alert('the file is uploded');
            }
    }

    function stopCapture() {
        if(cameraStream != null) {
            cameraStream.getTracks().forEach(function(track) {
                track.stop();
            });
        }
        
        if(processingStream != null) {
            processingStream.getTracks().forEach(function(track) {
                track.stop();
            });
        }
        
        if(mediaRecorder != null) {
            if(mediaRecorder.state == "recording") {
                mediaRecorder.stop();
            }
        }
        
        if(processingPreviewIntervalId != null) {
            clearInterval(processingPreviewIntervalId);
            processingPreviewIntervalId = null;
        }
    };
    </script>