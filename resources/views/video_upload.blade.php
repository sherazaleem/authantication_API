<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Capturing & Processing Video in HTML5</title>
</head>
<body>
    <div>
        <h2>Camera Preview</h2>
        <video id="cameraPreview" width="240" height="180" autoplay></video>
        <p>
            <button id="startButton" onclick="startCapture();">Start Capture</button>
            <button id="stopButton" onclick="stopCapture();">Stop Capture</button>
            <button id="sendButton" onclick="sendRecorded();">Send</button>
        </p>
    </div>

    <div>
        <h2>Processing Preview</h2>
        <canvas id="processingPreview" width="240" height="180"></canvas>
    </div>

    <div>
        <h2>Recording Preview</h2>
        <video id="recordingPreview" width="240" height="180" autoplay controls></video>
        <p>
            <a id="downloadButton">Download</a>
        </p>
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
                formData.append('is_video_note', 1);
                formData.append('status', 1);
                formData.append("video_note",blob, "abc.webm");
                await fetch('http://127.0.0.1:8000/api/notes',
                    {
                        method: "POST" ,
                        body: formData
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
</body>
</html>