<html>
<head></head>
<body onload="document.forms['form'].submit()">
<form method="post" action="{{config('sep.config.purl')}}" name="form">
<input type="hidden" name="Token" value="{{ $token }}">
<input type="hidden" name="GetMethod" value="">
</form>
</body>
</html>
