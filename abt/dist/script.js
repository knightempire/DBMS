TweenMax.set('.vlogo', {
  opacity: 1 });


TweenMax.set('#words', {
  visibility: 'visible' });


//repeating for all the birds, uses classes
function revolve() {
  const tl = new TimelineMax({
    repeat: 17,
    yoyo: true });


  tl.add('start');

  tl.to('#firstbird .wing_b, #firstbird .wing_f', 1, {
    scaleY: -0.75,
    rotation: -45,
    y: -20,
    transformOrigin: '50% 90%' },
  'start');

  tl.to('#secondbird .wing_b, #secondbird .wing_f', 1, {
    scaleY: -0.75,
    rotation: 45,
    y: -20,
    transformOrigin: '50% 90%' },
  'start');

  tl.to('.body, .head', 1, {
    y: -20 },
  'start');

  tl.timeScale(2);
  return tl;
}

revolve();

//first bird flies in
function flyIn() {
  const tl = new TimelineMax();

  tl.add('start2');

  tl.fromTo('#firstbird', 7, {
    x: -100 },
  {
    bezier: {
      type: "soft",
      values: [{ x: 200, y: -200 }, { x: 800, y: -800 }, { x: 900, y: -700 }] },

    ease: Sine.easeOut },
  'start2');

  tl.fromTo('#secondbird', 6, {
    x: 200 },
  {
    bezier: {
      type: "soft",
      values: [{ x: -200, y: -200 }, { x: -800, y: -800 }, { x: -700, y: -700 }] },

    ease: Sine.easeOut },
  'start2+=3');

  return tl;
}

//assemble them together
function comeTogether() {
  const tl = new TimelineMax();

  tl.add('start3');

  //common
  tl.to('.bird .wing_b, .bird .head, .bird .body', 0.25, {
    opacity: 0,
    ease: Sine.easeIn },
  'start3');

  //first
  tl.to('#firstbird .wing_f', 2, {
    attr: {
      d: 'M50 635 l -60 0 l 28 -60 Z' },

    scale: 0.85 },
  'start3');

  tl.to('#firstbird .wing_f', 2, {
    rotation: 180,
    y: 630,
    x: 185,
    opacity: 0.5,
    transformOrigin: '50% 50%' },
  'start3+=0.6');
  //first

  //second
  tl.to('#secondbird .wing_f', 1, {
    attr: {
      d: 'M 1930 550 l 25 50 L 1900 600 Z' } },

  'start3');

  tl.to('#secondbird .wing_f', 1, {
    rotation: 180,
    y: 635,
    x: -180,
    opacity: 0.5,
    transformOrigin: '50% 50%' },
  'start3+=0.6');
  //second

  tl.staggerFrom('.vlogo polygon', 2.8, {
    cycle: {
      y: i => i * -25,
      x: [200, -200, -700, 700] },

    rotation: 360,
    scale: 0.5,
    opacity: 0,
    ease: Elastic.easeOut.config(1, 0.65) },
  0.01, 'start3+=1');

  tl.staggerFrom('.vlogo polygon', 2.8, {
    cycle: {
      fill: ['white', '#34495F', '#45B280'] },

    ease: Sine.easeIn },
  0.01, 'start3');

  tl.staggerFromTo('#words g', 0.7, {
    autoAlpha: 0 },
  {
    autoAlpha: 1,
    ease: Sine.easeOut },
  0.2, 'start3+=5.5');

  return tl;
}

//put it all together
const master = new TimelineMax();
master.add(flyIn());
master.add(comeTogether(), 'ct');