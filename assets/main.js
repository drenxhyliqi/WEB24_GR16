function formatPrice(val) {
    return "€" + parseInt(val).toLocaleString();
}

$('#minPriceRange, #maxPriceRange').on('input change', function () {
    let minVal = parseInt($('#minPriceRange').val());
    let maxVal = parseInt($('#maxPriceRange').val());

    if (minVal > maxVal - 1000) {
        minVal = maxVal - 1000;
        $('#minPriceRange').val(minVal);
    }
    if (maxVal < minVal + 1000) {
        maxVal = minVal + 1000;
        $('#maxPriceRange').val(maxVal);
    }

    $('#minPriceDisplay').text(formatPrice(minVal));
    $('#maxPriceDisplay').text(formatPrice(maxVal));

    applyFilters();
});
