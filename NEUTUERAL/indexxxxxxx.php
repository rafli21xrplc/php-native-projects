<?php include 'header.php'; ?>

<div class="about_section layout_padding" id="about_section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="about_taital_main">
          <h1 class="about_taital">About Us</h1>
          <p class="about_text">
            There are many variations of passages of Lorem Ipsum available,
            but the majority have suffered alteration in some form, by
            injected humour, or randomised words which don't look even
            slightly believable. If you are going to use a passage of Lorem
            Ipsum, you need to be sure there isn't anything embarrassing
            hidden in the middle of text. All
          </p>
          <div class="readmore_bt"><a href="#">Read More</a></div>
        </div>
      </div>
      <div class="col-md-6 padding_right_0">
        <div>
          <img src="https://images.unsplash.com/photo-1540909163456-800870874263?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=849&q=80" class="about_img" />
        </div>
      </div>
    </div>
  </div>
</div>

<div class="services_section layout_padding" style="padding: 100px">
  <div class="container" id="services_section">
    <div class="services_section_2">
      <div class="text-center">
        <h1 class="services_taital mb-5 font-weight-bolder">
          Malang Membawa Ketenangan
        </h1>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div>
            <img src="https://images.unsplash.com/photo-1559628151-ef85aab5bb21?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" class="services_img rounded-4" />
          </div>
          <div class="btn_main"><a href="#">village</a></div>
        </div>
        <div class="col-md-4">
          <div>
            <img src="https://images.unsplash.com/photo-1621071437499-a6cbed2219d9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" class="services_img rounded-4" />
          </div>
          <div class="btn_main active"><a href="#">Waterfall</a></div>
        </div>
        <div class="col-md-4">
          <div>
            <img src="https://images.unsplash.com/photo-1588528305358-5c7399b6a184?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" class="services_img rounded-4" />
          </div>
          <div class="btn_main"><a href="#">Beach</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="bloging_section">
  <div class="layout_padding" style="padding: 100px">
    <div class="container">
      <h1 class="services_taital my-5 text-center font-weight-bolder">
        PANTAI MALANG
      </h1>

      <?php $query = mysqli_query($conn, "SELECT * FROM wisata"); ?>
      <?php while ($row = mysqli_fetch_assoc($query)) : ?>
        <div class="row border-bottom pb-5 mb-5">
          <div class="col-lg-4 col-12">
            <img src="images/<?= $row['gambar'] ?>" class="schedule-image img-fluid rounded-4" alt="" />
          </div>

          <div class="col-lg-8 col-12 mt-3 mt-lg-0">
            <h2 class="mb-2 mx-3 mx-lg-3 font-weight-bolder">
              <?= $row['name'] ?>
            </h2>

            <p>
              <?= $row['body'] ?>
            </p>

            <div class="d-flex align-items-center mt-4">
              <div class="d-flex">
                <img src="images/avatar/happy-asian-man-standing-with-arms-crossed-grey-wall.jpg" class="img-fluid avatar-image" alt="" />
              </div>

              <span class="mx-3 mx-lg-4">
                <i class="bi-clock me-2"></i>
                <?= $row['operasional'] ?>
              </span>

              <span class="mx-1 mx-lg-5">
                <i class="bi-layout-sidebar me-2"></i>
                <?= $row['category'] ?>
              </span>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="row">
    </div>

  </div>

  <div class="tab-pane fade" id="nav-DayFour" role="tabpanel" aria-labelledby="nav-DayFour-tab">
    <div class="row">
      <div class="col-lg-4 col-12">
        <img src="images/schedule/jeshoots-com-TWRCH-GaKr4-unsplash.jpg" class="schedule-image img-fluid" alt="" />
      </div>

      <div class="col-lg-8 col-12 mt-3 mt-lg-0">
        <h4 class="mb-2">After Party at the fullest</h4>

        <p>
          There is a plenty of great HTML CSS templates available at
          TemplateMo.com website for your businesses. You can download,
          edit and use any template for any purpose. Please let us know
          <a rel="nofollow" href="https://templatemo.com/contact" target="_parent"><u>your feedback via Email</u></a>. Thank you.
        </p>

        <div class="d-flex align-items-center mt-4">
          <span>
            <i class="bi-clock me-2"></i>
            8:00 - 9:00 AM
          </span>

          <span class="mx-1 mx-lg-5">
            <i class="bi-layout-sidebar me-2"></i>
            Conference Hall 2
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<div id="vidio_section">
  <div class="layout_padding" style="padding: 100px; background-color: #f6f6f6">
    <div class="container">
      <h1 class="blog_taital text-black">LIHAT CUPLIKAN</h1>
      <p class="blog_text text-black">
        Malang merupakan salah satu kota yang menjadi destinasi favorit para
        traveler. Kota ini memiliki banyak sekali tempat wisata dengan tema
        yang beragam, mulai dari budaya hingga modern.
      </p>
      <div class="my-5 text-center">
        <iframe width="760" height="415" src="https://www.youtube.com/embed/CLfpQJpVTTc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>