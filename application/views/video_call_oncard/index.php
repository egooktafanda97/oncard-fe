<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin:0; padding:0;">

<div id="meet"  style="margin:0; padding:0;"></div>
    

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src='https://meet.jit.si/external_api.js'></script>

<script>
  $(document).ready(function () {
    const domain = 'meet.jit.si';
    const options = {
        roomName: 'TelfonBersamaOrtuSantri',
        width: 500,
        height: 700,
        parentNode: document.querySelector('#meet'),
        lang: 'ID',
        configOverwrite: { startWithAudioMuted: false },
        interfaceConfigOverwrite: { DISABLE_DOMINANT_SPEAKER_INDICATOR: true },
        userInfo: {
            email: 'email@jitsiexamplemail.com',
            displayName: 'John Doe'
        }
    };
    const api = new JitsiMeetExternalAPI(domain, options);
   });
</script>

</body>
</html>