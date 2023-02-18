const animItems = document.querySelectorAll("._anim-item")

function onClickBurgerMenu() {
  let burgerBtn = document.querySelector(".navbar__burger_menu")
  let headerElem = document.querySelector(".header")

  burgerBtn.classList.toggle("_active")

  if (burgerBtn.classList.contains("_active") && !headerElem.classList.contains("_active")) {
    headerElem.classList.add("_active")
  }

  if (!burgerBtn.classList.contains("_active") && headerElem.classList.contains("_active")) {
    headerElem.classList.remove("_active")
  }
}

if (animItems.length > 0) {
  window.addEventListener('scroll', animOnScroll)

  function animOnScroll() {
    for (let index = 0; index < animItems.length; index++) {
      const animItem = animItems[index]
      const animItemHeight = animItem.offsetHeight;
      const animItemOffset = offset(animItem).top
      const animStart = 4
      
      let burgerBtn = document.querySelector(".navbar__burger_menu")

      let animItemPoint = window.innerHeight - animItemHeight / animStart

      if (animItemHeight > window.innerHeight) {
        animItemPoint = window.innerHeight - animItemHeight / animStart
      }

      if ((pageYOffset > animItemOffset - animItemPoint) && pageYOffset < (animItemOffset + animItemHeight)) {
        animItem.classList.add("_active")
      } else {
        if (!animItem.classList.contains("_anim-no-hide"))
          animItem.classList.remove("_active")
      }

      // Toggle black background when navbar scrolled
      if (animItem.classList.contains("header") 
        && animItem.classList.contains("_active")
        && (window.pageYOffset < 10)
        && !burgerBtn.classList.contains("_active")) {

        animItem.classList.remove("_active")
      }

      // Toggle black background when burger menu active
      if (burgerBtn.classList.contains("_active") && animItem.classList.contains(".header")) {
        animItem.classList.add("_active")
      } else if (!burgerBtn.classList.contains("_active") && animItem.classList.contains(".header")) {
        animItem.classList.remove("_active")
      }
    }
  }

  function offset(el) {
    const rect = el.getBoundingClientRect(),
      scrollLeft = window.pageXOffsex || document.documentElement.scrollLeft,
      scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    return { top: rect.top + scrollTop, left: rect.left + scrollLeft }
  }

  setTimeout(() => {
    animOnScroll()
  }, 300)
}