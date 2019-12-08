package day4

fun isAllIncreasingNumbers(num: String): Boolean {
    var prev = Character.MIN_VALUE
    for (char in num.iterator()) {
        if (char.toInt() < prev.toInt()) return false
        prev = char
    }
    return true
}

fun hasDouble(num: String): Boolean {
    var prev = Character.MIN_VALUE
    for (char in num.iterator()) {
        if (char == prev) return true
        prev = char
    }
    return false
}

fun hasDoublePart2(num: String): Boolean {
    val numCount = hashMapOf<Char, Int>()
    for (char in num.iterator()) {
        val count = numCount.get(char)
        if (count != null) numCount.set(char, count + 1) else numCount.set(char, 1)
    }
    return numCount.containsValue(2)
}

fun main() {
    var num = 240920
    val max = 789857
    var count = 0
    while(num <= max) {
//  if (hasDouble(num.toString()) && isAllIncreasingNumbers(num.toString())) { /*part 1:*/
    if (hasDoublePart2(num.toString()) && isAllIncreasingNumbers(num.toString())) { /*part 2:*/
        count++
        }
        num++
    }
    println(count)
}

