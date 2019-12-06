import java.io.File

fun main() {
    var total = 0
    File("input.txt").readLines().forEach { mass ->
        total += Math.floorDiv(mass.toInt(), 3) - 2
    }
    println(total)
}
