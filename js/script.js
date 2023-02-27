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

ymaps.ready(init);        
function init() {
	var myMap = new ymaps.Map("map", {
		center: [44.593620976977775,33.48917489047195],
		zoom: 16
	}, {
		searchControlProvider: 'yandex#search'
	});
 
	/* Начальный адрес метки */
	var address = 'Россия, Севастополь, Руднева, д. 38';
 
	ymaps.geocode(address).then(function(res) {
		var coord = res.geoObjects.get(0).geometry.getCoordinates();
 
		var myPlacemark = new ymaps.Placemark(coord, null, {
			preset: 'islands#blueDotIcon',
			draggable: true
		});
 
		/* Событие dragend - получение нового адреса */
		myPlacemark.events.add('dragend', function(e){
			var cord = e.get('target').geometry.getCoordinates();
			$('#ypoint').val(cord);
			ymaps.geocode(cord).then(function(res) {
				var data = res.geoObjects.get(0).properties.getAll();
				$('#address').val(data.text);
			});
		});
		
		myMap.geoObjects.add(myPlacemark);	
		myMap.setCenter(coord, 15);
	});
}

const categories = document.getElementsByClassName("categories__category")
if (categories.length > 0) {
  for (let category of categories) { category.addEventListener('click', toggleSubcategories) }
}

function toggleSubcategories(el) {
  el.target.classList.toggle("_active")
  el.stopPropagation()
}