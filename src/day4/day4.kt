package day4

fun isAllIncreasingNumbers(num: String): Boolean {
    var prev = num.get(0)
    var index = 1
    while (index < num.length) {
        if (num.get(index).toInt() < prev.toInt()) {
            return false
        }
        prev = num.get(index)
        index++
    }
    return true
}

fun hasDouble(num: String): Boolean {
    var prev = num.get(0)
    var index = 1
    while (index < num.length) {
        if (num.get(index) == prev) {
            return true
        }
        prev = num.get(index)
        index++
    }
    return false
}

fun main() {
    var num = 240920
    var max = 789857
    var count = 0;
    while(num <= max) {
        if (hasDouble(num.toString()) && isAllIncreasingNumbers(num.toString())) {
            count++
        }
        num++
    }
    println(count);
}

