document.addEventListener('DOMContentLoaded', async () => {
    const container = document.querySelector("#carousel");
    const URL = "http://localhost:9000/ctrl/carousel/carousel.php";
    console.log(fetch(URL));


    async function fetchData(URL) {
        const response = await fetch(URL);
        const data = await response.json();
        return data;
    }

    async function displayImages(URL) {
        const data = await fetchData(URL);
        console.log('data:', data)

        data.forEach((element) => {
            const carouselCell = document.createElement("div");
            carouselCell.className = "carousel-cell";

            const image = document.createElement("img");

            image.src = element.url;
            image.alt = element.alt;
              console.log(image);

            carouselCell.appendChild(image);
            container.appendChild(carouselCell);
        });

        // Initialize Flickity carousel after adding images
        let carousel = document.querySelector('#carousel');
        let flkty = new Flickity(carousel, {
          imagesLoaded: true,
          percentPosition: false,
          autoPlay: true,
        });
    }

    await displayImages(URL);
});
