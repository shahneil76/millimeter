<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSAP Scroll Animation Demo</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }

        header,
        footer {
            position: fixed;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
            z-index: 9999;
        }

        header {
            top: 0;
        }

        footer {
            bottom: 0;
        }

        .container {
            width: 100%;
            height: 5000px;
            /* This height is just for demonstration purpose */
        }

        .image {
            width: 100%;
            height: 300px;
            /* Adjust height as needed */
            background-size: cover;
            background-position: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <header>Header</header>
    <div class="container">
        <?php
            $base_url = 'http://synergyfund.890m.com/milimeter/index_';
            $extension = '.jpg';
        
            for ($i = 0; $i < 180; $i++) {
                // Generate the index with leading zeros
                $index = str_pad($i, 6, '0', STR_PAD_LEFT);
                // Construct the URL
                $url = $base_url . $index . $extension;
        ?>
            <div class="image" style="background-image: url('<?= $url ?>');">
        </div>
        <?php
                
            }
        ?>
    </div>
    <footer>Footer</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script>
        gsap.utils.toArray('.image').forEach((image, i) => {
          let prevScroll = 0;
          let scrollAmount = 0;
    
          const tl = gsap.timeline({
            scrollTrigger: {
              trigger: image,
              start: "top bottom",
              end: "bottom top",
              scrub: true
            }
          });
    
          tl.fromTo(image, { y: "100%" }, { y: "0%", duration: 1 });
    
          document.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            scrollAmount += (currentScroll - prevScroll);
            prevScroll = currentScroll;
    
            const imageIndex = Math.floor(scrollAmount / window.innerHeight);
            gsap.set('.image', { zIndex: 0 });
            gsap.set('.image:nth-child(' + (imageIndex + 1) + ')', { zIndex: 1 });
          });
        });
      </script>
</body>

</html>
