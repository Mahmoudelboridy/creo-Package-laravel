<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>activation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<h2 class="text-center">activation</h2>
<div class="row mt-5 d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-xl-6">
<form action="" method="post">
    @csrf
<div class="form-outline mb-4">
                <label class="mb-1">activation code</label> <input type="password" class="form-control"
                    placeholder="Enter u activation code"  required="required"
                    name="code" />
            </div>
            <div class="text-center">
                <button class=" bg-info mb-3 py-2 px-3 border-0" name="check">check</button>
</form>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
</html>