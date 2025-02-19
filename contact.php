<?php include 'header.php'; ?>
    <!-- Hero Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Contact</h1>
                        <p class="fs-4 text-dark">We’re always here to assist you! Whether you have questions, need support, or just want to get in touch, feel free to contact us anytime. Our team is ready to help and ensure you have the best experience possible! </p>
                        <hr>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Contact Us Section -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="text-center mb-5 wow fadeIn" data-wow-delay="0.1s">
                <p class="fs-5 text-uppercase text-primary">Get In Touch</p>
                <h1 class="display-3">Contact Us</h1>

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php
                        if (isset($_SESSION['success'])) {
                            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
                            unset($_SESSION['success']); // Remove message after displaying
                        } elseif (isset($_SESSION['error'])) {
                            echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
                            unset($_SESSION['error']);
                        }
                    ?>
                    <form action="send_email.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact *</label>
                            <input type="number" name="number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>