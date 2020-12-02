package day3

import java.io.File

fun walk(instruction: String, start: List<Int>): MutableSet<List<Int>> {
    var coords = mutableSetOf(start)
    var direction = instruction.take(1)
    var count = instruction.takeLast(instruction.length - 1).toInt()
    var steps = 0
    while (steps < count) {
        if (direction == "R") {
            coords.add(listOf(coords.last().get(0) + 1, coords.last().get(1)))
        }

        if (direction == "L") {
            coords.add(listOf(coords.last().get(0) - 1, coords.last().get(1)))
        }

        if (direction == "U") {
            coords.add(listOf(coords.last().get(0), coords.last().get(1) - 1))
        }

        if (direction == "D") {
            coords.add(listOf(coords.last().get(0), coords.last().get(1) + 1))
        }
        steps++;
    }
    return coords
}

fun getMinManhattan(intersects: Iterator<List<Int>>): Int {
    var distances = mutableListOf<Int>()
    for (coords in intersects) {
        distances.add(Math.abs(coords.get(0)) + Math.abs(coords.get(1)))
    }
    distances.sort()
    return distances.get(1)
}

fun handleDirections(directions: List<String>): MutableSet<List<Int>> {
    var start = listOf(0, 0)
    var results = mutableSetOf<List<Int>>()
    for (instruction in directions.iterator()) {
        var res = walk(instruction, start)
        results.addAll(res)
        start = res.last()
    }

    return results
}

fun main() {
    val lines = File("./src/day3/input.txt").readLines()
    val results1 = handleDirections(lines.get(0).split(","))
    val results2 = handleDirections(lines.get(1).split(","))

    println(getMinManhattan((results1 intersect results2).iterator()))
}