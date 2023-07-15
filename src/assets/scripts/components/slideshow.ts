import Swiper from "swiper";
import {Autoplay} from "swiper/modules";

new Swiper('.swiper', {
    // Optional parameters
    modules: [Autoplay],
    direction: 'horizontal',
    loop: true,
    autoplay: {
        delay: 5000,
    }
});
