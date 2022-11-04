for (var i = 0; i < imgs.length; i++) {
    if (imgs[i] != null) {

        if (!isValidURL(imgs[i])) {

            gallery_thumb +=`<div class="swiper-slide swiper-slide-visible swiper-slide-active ${i == 0 ? ' swiper-slide-thumb-active' : ( i == 1 ? 'swiper-slide-prev' : (i == 2 ? 'swiper-slide-active' : (i == 3 ? 'swiper-slide-next' : '')))} " data-swiper-slide-index="${i}" role="group" aria-label="${i+1} / ${imgs.length}" style="height: 56px; margin-bottom: 10px;">
                                <img src="${insertAtPosition(imgs[i])}" alt="${insertAtPosition(imgs[i])}">
                            </div>`

            gallery_top += `<div class="swiper-slide ${i == 0 ? 'swiper-slide-active' : (i == 1 ? 'swiper-slide-next' : (i == 2 ? 'swiper-slide-duplicate-prev' : ''))}" data-swiper-slide-index="${i}" role="group" aria-label="${i+1} / ${imgs.length}"
                                style="width: 437px; margin-right: 10px;">
                                <img src="${insertAtPosition(imgs[i],'med')}" alt="${insertAtPosition(imgs[i])}" class="proSlideImg">
                            </div>`

        } else {

            gallery_thumb +=`<div class="swiper-slide swiper-slide-visible swiper-slide-active ${i == 0 ? ' swiper-slide-thumb-active' : ( i == 1 ? 'swiper-slide-prev' : (i == 2 ? 'swiper-slide-active' : (i == 3 ? 'swiper-slide-next' : '')))} " data-swiper-slide-index="${i}" role="group" aria-label="${i+1} / ${imgs.length}" style="height: 56px; margin-bottom: 10px;">
                                <img src="${imgs[i]}" alt="${imgs[i]}">
                            </div>`

            gallery_top += `<div class="swiper-slide ${i == 0 ? 'swiper-slide-active' : (i == 1 ? 'swiper-slide-next' : (i == 2 ? 'swiper-slide-duplicate-prev' : ''))}" data-swiper-slide-index="${i}" role="group" aria-label="${i+1} / ${imgs.length}"
                                style="width: 437px; margin-right: 10px;">
                                <img src="${imgs[i]}" alt="${imgs[i]}" class="proSlideImg">
                            </div>`
        }
    }


    $("#swiper-wrapper-gallery-thumbs").html(gallery_thumb)
    $("#swiper-wrapper-gallery-top").html(gallery_top)
}