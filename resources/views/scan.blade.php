@extends('layouts.app')
@section('head')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
@endsection
@section('content')
<video id="preview"></video>
@endsection
@section('scripts')
<script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        alert(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
@endsection