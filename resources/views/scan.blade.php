@extends('layouts.app')
@section('head')
<style>
video {
  margin: 1rem;
  max-width: 90vw;
}

.camera-list {
  margin-top: 1rem;
}
</style>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
@endsection
@section('content')
<section class="camera-list">
      <ul id="cameras"></ul>
    </section>
    <video id="preview"></video>
    <ul id="scannedText"></ul>

	
@endsection
@section('scripts')
<script type="text/javascript">
      const $cameras = document.getElementById('cameras');
      const $scannedText = document.getElementById('scannedText');
      const $preview = document.getElementById('preview');
      let CAMERAS = [];

      let scanner = new Instascan.Scanner({ video: $preview,/* continuous: false*/ });
      scanner.addListener('scan', function (content) {
        console.log(content);
        scanOutput(content);
      });

      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length === 0) {
          console.error('No cameras found.');
          return;
        }
        cameras.forEach( el => addCameraToList(el) );
        CAMERAS = cameras;
      }).catch(function (e) {
        console.error(e);
      });

      $cameras.addEventListener('click', scannerStart);

      function scannerStart(event) {
        let activeCamera = CAMERAS.find( el => el.id === event.target.id );
        scanner.start(activeCamera);
      }

      function addCameraToList (el) {
        let a = document.createElement("a");
        let newItem = document.createElement("li");

        a.textContent = el.name;
        a.setAttribute('id', el.id);
        a.setAttribute('href', "#");
        newItem.appendChild(a);
        $cameras.appendChild(newItem);
      }

      function scanOutput(content) {
        let li = document.createElement('li');
        li.appendChild(document.createTextNode(content));
        $scannedText.appendChild(li);
      }
    </script>
@endsection