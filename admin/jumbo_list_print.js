function printTable() {
    var extraSectionContents = document.querySelector('.header').innerHTML;
    var containerContents = document.querySelector('.container').innerHTML;

    var printContents = extraSectionContents + containerContents;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}