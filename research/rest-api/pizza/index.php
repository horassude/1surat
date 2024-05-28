<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Menu by Javascript</title>
</head>


<body>
    <nav class="navbar navbar-expand-lg bg-body-dark">
        <div class="container-fluid bg-dark">
            <a class="navbar-brand" href="#">
                <img src="<?= imgSrc("pizza/logo.png") ?>" width="120">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">All Menu</a>
                    <a class="nav-link" aria-current="page" href="#">Pizza</a>
                    <a class="nav-link " aria-current="page" href="#">Pasta</a>
                    <a class="nav-link" aria-current="page" href="#">Nasi</a>
                    <a class="nav-link" aria-current="page" href="#">Minuman</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <h1 id="kategori">All Menu</h1>
        </div>

        <div class="row" id="daftar-menu">

        </div>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
   

    <script>
        fetchMenu();

        function fetchMenu(food = null) {
            
            fetch("http://myapp.com/json/pizza.json")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    
                    if(food === null ) {
                        var menu = data.menu;
                    } else {
                        var menu = data.menu.filter(function(item) {
                            if(food.toUpperCase() === 'ALL MENU') {
                                console.log(1);
                                return data.menu;
                            } else {
                                return item.kategori.toUpperCase() === food.toUpperCase();
                            }
                        })
                    }

                    console.log(menu);
                    document.getElementById("daftar-menu").innerHTML = '';
                    menu.forEach(function(menu, index) {
                        document.getElementById("daftar-menu").innerHTML += `
                            <div class="col-md-4">
                                <div class="card mb-3" style="width: 18rem;">
                                    <img src="http://myapp.com/images/pizza/${menu.gambar}" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">${menu.nama}</h5>
                                            <p class="card-text">${menu.deskripsi}</p>
                                            <h5 class="card-title">Rp. ${formatNumber(menu.harga)}</h5>
                                            <a href="#" class="btn btn-primary">
                                                Pesan sekarang
                                            </a>
                                        </div>
                                </div>
                            </div>
                        `;
                    })
                })
                .catch(error => {
                    console.error('There was a problem with your fetch operation:', error);
                });
        }
        

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                document.getElementById("kategori").textContent = link.textContent;
                fetchMenu(link.textContent);
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active');
                    this.classList.add('active');
                })
            });
        });


        function formatNumber(number) {
            const formatter = new Intl.NumberFormat('en-US');
            const formattedNumber = formatter.format(number);
            return formattedNumber;
        }

    </script>

</body>

</html>