<!DOCTYPE html>
<html lang="en">

<head>
    <title style="font-size"><img src="imagenes/logo2.jpg" alt="">ACME TECH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
     integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>

    </style>

</head>

<body>


    <div class="jumbotron text-center" style="margin-bottom:0; background-color:#fff;">
        <img src="imagenes/logo2.jpg" alt="" width="250px" height="250px" class="float-left">
        <h1 style="font-size:105px; font-family:Sans-serif; text-align:left;">ACME TECH...</h1>
        <p style="color:black; font-family:Sans-serif; font-size: 65px; text-align:center;">¡Diseñando tus
            sueños!</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="inicio.php" style="font-family:Sans-serif; font-size:20px;">Sobre nosotros</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                            style="font-family:Sans-serif; font-size:20px;">
                            Vestidos
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="compu_gamer.php"
                                style="font-family:Sans-serif; font-size:16px;">Vestidos Nuevos</a>
                            <a class="dropdown-item" href="laptop_alquiler.php"
                                style="font-family:Sans-serif; font-size:16px;">Vestidos Usados</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                            style="font-family:Sans-serif; font-size:20px;">
                            Trajes
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" style="font-family:Sans-serif; font-size:16px;">Trajes
                                Nuevos</a>
                            <a class="dropdown-item" href="#" style="font-family:Sans-serif; font-size:16px;">Trajes de
                                Segunda</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                            style="font-family:Sans-serif; font-size:20px;">
                            Servicios
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"
                                style="font-family:Sans-serif; font-size:16px;">Lavanderia</a>
                            <a class="dropdown-item" href="#" style="font-family:Sans-serif; font-size:16px;">Alquiler</a>
                            <a class="dropdown-item" href="#"
                                style="font-family:Sans-serif; font-size:16px;">Asesoramiento</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <form action="" method="post">
        <div class="container">

        </div>
        <Row className="mb-3">
            <Form.Group as={Col} controlId="formGridEmail">
                <Form.Label>Email</Form.Label>
                <Form.Control type="email" placeholder="Enter email" />
            </Form.Group>

            <Form.Group as={Col} controlId="formGridPassword">
                <Form.Label>Password</Form.Label>
                <Form.Control type="password" placeholder="Password" />
            </Form.Group>
        </Row>

        <Form.Group className="mb-3" controlId="formGridAddress1">
            <Form.Label>Address</Form.Label>
            <Form.Control placeholder="1234 Main St" />
        </Form.Group>

        <Form.Group className="mb-3" controlId="formGridAddress2">
            <Form.Label>Address 2</Form.Label>
            <Form.Control placeholder="Apartment, studio, or floor" />
        </Form.Group>

        <Row className="mb-3">
            <Form.Group as={Col} controlId="formGridCity">
                <Form.Label>City</Form.Label>
                <Form.Control />
            </Form.Group>

            <Form.Group as={Col} controlId="formGridState">
                <Form.Label>State</Form.Label>
                <Form.Select defaultValue="Choose...">
                    <option>Choose...</option>
                    <option>...</option>
                </Form.Select>
            </Form.Group>

            <Form.Group as={Col} controlId="formGridZip">
                <Form.Label>Zip</Form.Label>
                <Form.Control />
            </Form.Group>
        </Row>

        <Form.Group className="mb-3" id="formGridCheckbox">
            <Form.Check type="checkbox" label="Check me out" />
        </Form.Group>

        <Button variant="primary" type="submit">
            Submit
        </Button>

    </form>
</body>

</html>