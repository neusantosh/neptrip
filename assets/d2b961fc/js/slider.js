/* 
 * Author : Sarthak Dabhi
 * Email : dabhi.sarthak@gmail.com
 * Skype : sarthakdabhi
 * Twitter : SarthakDabhi
 * Mobile : +91 953 725 2723
 */
function Slider(e,t){this.container=e;this.nav=t.show();this.imgs=this.container.find("img");this.imgWidth=this.imgs.first().width();this.imgsLen=this.imgs.length;this.current=0}Slider.prototype.transition=function(e){this.container.animate({"margin-left":e||-(this.current*this.imgWidth)})};Slider.prototype.setCurrent=function(e){var t=this.current;t+=~~(e==="next")||-1;this.current=t<0?this.imgsLen-1:t%this.imgsLen;return t}