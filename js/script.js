const animItems = document.querySelectorAll("._anim-item")

if (animItems.length > 0) {
  window.addEventListener('scroll', animOnScroll)

  function animOnScroll() {
    console.log(window.pageYOffset)
    for (let index = 0; index < animItems.length; index++) {
      const animItem = animItems[index]
      const animItemHeight = animItem.offsetHeight;
      const animItemOffset = offset(animItem).top
      const animStart = 4

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

      if (animItem.classList.contains("header") && animItem.classList.contains("_active") && (window.pageYOffset < 10)) {
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
  }, 1000)
}