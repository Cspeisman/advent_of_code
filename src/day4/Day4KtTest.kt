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

fun main() {
    testIncreasing()
    testHasDouble()
}