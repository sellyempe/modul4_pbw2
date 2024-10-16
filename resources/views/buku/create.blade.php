<x-layout>
    <div class="container">
        <div class="row p-lg-3">
            <div class="col">
                <form action="/buku" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- <Style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');
 
*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

html, body {
    height: 100%;
    background-color: #152733;
    overflow: auto;
}


.form-holder {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      min-height: 100vh;
}

.form-holder .form-content {
    position: relative;
    text-align: center;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    padding: 60px;
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: #fff;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content h3.form-title {
    margin-bottom: 30px;
}

.form-content p {
    color: #fff;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}

.form-content input[type=text], .form-content input[type=text], .form-content input[type=email], .form-content select {
    width: 100%;
    padding: 9px 20px;
    text-align: left;
    border: 0;
    outline: 0;
    border-radius: 6px;
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-top: 16px;
}


.btn-primary{
    background-color: #6C757D;
    outline: none;
    border: 0px;
     box-shadow: none;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active{
    background-color: #495056;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}

.form-content textarea {
    position: static !important;
    width: 100%;
    padding: 8px 20px;
    border-radius: 6px;
    text-align: left;
    background-color: #fff;
    border: 0;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    outline: none;
    resize: none;
    height: 120px;
    -webkit-transition: none;
    transition: none;
    margin-bottom: 14px;
}

.form-content textarea:hover, .form-content textarea:focus {
    border: 0;
    background-color: #ebeff8;
    color: #8D8D8D;
}

.mv-up{
    margin-top: -9px !important;
    margin-bottom: 8px !important;
}

.invalid-feedback{
    color: #ff606e;
}

.valid-feedback{
   color: #2acc80;
}
</Style> -->

                    <form>

                        <!-- FORMKU YANG LAMA -->
                        <h1>Tambah Buku</h1>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul') }}" id="judul" name="judul">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                                value="{{ old('penulis') }}" id="penulis" name="penulis">
                            @error('penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select form-select-md mb-3 @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori">
                                <option value="" selected>Pilih Kategori</option>
                                <option value="Novel">Novel</option>
                                <option value="Komik">Komik</option>
                                <option value="Biografi">Biografi</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sampul" class="form-label">Sampul Buku</label>
                            <img class="img-preview img-fluid mb-3" width="250px">
                            <input class="form-control @error('sampul') is-invalid @enderror" type="file" id="sampul"
                                name="sampul" onchange="previewImage()">
                            @error('sampul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                    <!-- PENUTUPPPP -->

                    <!-- BOOTSTRAP -->
                    <!-- <div class="form-body">
                    <div class="row">
                        <div class="form-holder">
                            <div class="form-content">
                                <div class="form-items">
                                    <form action="/buku" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h3>Tambah Buku</h3>
                                    <form class="requires-validation" novalidate>

                                        <div class="col-md-12">
                                            <input class="form-control" type="text" name="tname" placeholder="Judul Buku" 
                                            class="form-control" value="{{ old('judul') }}" id="judul" name="judul" required>
                                            <div class="valid-feedback">Judul buku valid!</div>
                                            <div class="invalid-feedback">Judul buku tidak boleh kosong!</div>
                                        </div>

                                        <div class="col-md-12">
                                            <input class="form-control" type="text" name="aname" placeholder="Penulis Buku" 
                                            value="{{ old('penulis') }}" id="judul" name="penulis" required>
                                            <div class="valid-feedback">Penulis buku valid!</div>
                                            <div class="invalid-feedback">Penulis buku tidak boleh kosong!</div>
                                        </div>

                                        <div class="col-md-12">
                                            <select class="form-select mt-3" required>
                                                    <option selected disabled value="">Kategori Buku</option>
                                                    <option value="jweb">Novel</option>
                                                    <option value="sweb">Komik</option>
                                                    <option value="pmanager">Biografi</option>
                                            </select>
                                            <div class="valid-feedback">Kamu sudah memilih kategori!</div>
                                            <div class="invalid-feedback">Silahkan pilih kategori!!!!</div>
                                        </div>


                                        <br>
                                        <div class="col-md-12">
                                        <label for="Sampul Buku" class="form-label" style="color: white;">Sampul Buku</label>
                                            <img class="img-preview img-fluid mb-3" width="250px">
                                            <input class="form-control" type="file" id="sampul" name="sampul" onchange="previewImage()" required>
                                        </div>
                                        <br>
                                        <div class="form-button mt-3">
                                            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- END BOOTSTRAP -->
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#sampul');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
    <!-- <script>
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.requires-validation')
            Array.from(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
        })()

    </script> -->

</x-layout>