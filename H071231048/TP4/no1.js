function countEvenNumbers(nilaiStart, nilaiEnd) {
    if (nilaiStart > nilaiEnd) {
        console.log("Angka tidak valid: nilaiStart lebih besar dari nilaiEnd");
        return;
    }

    let tampungAngka = []

    if (nilaiStart % 2 == 0) {
        tampungAngka.push(nilaiStart)
        nilaiStart += 2;
        while (nilaiStart <= nilaiEnd) {
            tampungAngka.push(nilaiStart)
            nilaiStart += 2;
        }
    } else {
        nilaiStart += 1;
        while (nilaiStart <= nilaiEnd) {
            tampungAngka.push(nilaiStart)
            nilaiStart += 2;
        }
    }

    let output = `(${tampungAngka.join(', ')})`;
    console.log("Output = " + tampungAngka.length + output)
}

countEvenNumbers(20, 10)