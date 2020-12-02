package day1

import java.io.File

fun main() {
    var total = 0
    File("./src/day1/input.txt").readLines().forEach { mass ->
        total += Math.floorDiv(mass.toInt(), 3) - 2
    }
    println(total)
}
