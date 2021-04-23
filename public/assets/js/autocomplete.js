$(window).on('load', function () {
  function initializeInput (element) {
    var request = null;
    var dropdown = null;

    const jElement = $(element)
    jElement.on('input', () => {
      console.log('Oh my god, they are inputting!')

      const keyword = element.value
      if (keyword.length < 3) {
        return
      }
      if (request) {
        request.abort()
        request = null
      }

      request = $.ajax(`/api/autocomplete?keyword=${keyword}`)
      request.then(({cities, airports}) => {
          console.log('Data for auto suggestion is', cities, airports)
          showDropdown(cities, airports)
        })
    })


    function select(type, name, id) {
      hideDropdown()
      jElement.val(name)
      $(jElement.data('cityInput')).val(null)
      $(jElement.data('airportInput')).val(null)
      $(jElement.data(`${type}Input`)).val(id)
    }
    function showDropdown(cities = [], airports = []) {
      hideDropdown()
      const items = cities.map(c => ({...c, type: 'city'}))
        .concat(airports.map(a => ({...a, type: 'airports'})))
      const dropdownItems = items.map((item) => {
        const element = $(`<div class="cursor-pointer">${item.name}</div>`)
        element.on('click', () => select(item.type, item.name, item.id))
        return element
      })
      dropdown = $(`
        <div class="position-absolute bg-white w-100 p-2 border"
             style="top: 100%; box-shadow: 0 0 4px 1px #d2d2d2"></div>`)
      dropdown.append(dropdownItems)
      jElement.parent().append(dropdown)
    }
    function hideDropdown() {
      if (dropdown) {
        dropdown.remove()
        dropdown = null
      }
    }
  }

  $('.location-autocomplete')
    .each((_, el) => initializeInput(el))
})