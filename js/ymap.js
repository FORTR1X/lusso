ymaps.ready(init);
function init() {
	var myMap = new ymaps.Map("map", {
		center: [44.593620976977775, 33.48917489047195],
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