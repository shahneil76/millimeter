const intro = document.querySelector(".intro");
const mobileVideo = intro.querySelector(".mobile-video");
const desktopVideo = intro.querySelector(".desktop-video");
const text = intro.querySelector("h1");
//END SECTION
const section = document.querySelector("section");
const end = section.querySelector("h1");

//SCROLLMAGIC
const controller = new ScrollMagic.Controller();

//Scenes
let scene = new ScrollMagic.Scene({
  duration: 2520,
  triggerElement: intro,
  triggerHook: 0
})
  // .addIndicators()
  .setPin(intro)
  .addTo(controller);

//Text Animation
const textAnim = gsap.fromTo(text, 3, { opacity: 1 }, { opacity: 0 });

let scene2 = new ScrollMagic.Scene({
  duration: 3000,
  triggerElement: intro,
  triggerHook: 0
})
  .setTween(textAnim)
  .addTo(controller);

//Video Animation
let accelamount = 0.3;
let scrollpos = 0;
let delay = 0;

scene.on("update", e => {
  scrollpos = e.scrollPos / 1000;
});

setInterval(() => {
  delay += (scrollpos * 4 - delay) * accelamount;
  //console.log(scrollpos, delay);

  mobileVideo.currentTime = delay;
  desktopVideo.currentTime = delay;
}, 40);
console.log(mobileVideo);