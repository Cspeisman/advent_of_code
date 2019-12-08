package day4

import java.lang.Error

fun assert(truthy: Boolean) {
    if (!truthy) {
        throw Error("your test failed")
    }
}
fun testIncreasing() {
    assert(isAllIncreasingNumbers("12345"))
    assert(isAllIncreasingNumbers("111111"))
    assert(isAllIncreasingNumbers("10315") == false)
}

fun testHasDouble() {
    assert(hasDouble("111111"))
    assert(hasDouble("123456") == false)
}

fun testHasDoublePart2() {
    assert(hasDoublePart2("112233"))
    assert(hasDoublePart2("123444") == false)
    assert(hasDouble("111122"))
}

fun main() {
    testIncreasing()
    testHasDouble()
    testHasDoublePart2()
}