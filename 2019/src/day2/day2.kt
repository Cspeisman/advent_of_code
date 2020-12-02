package day2

import java.io.File

val nextOpCode = 4;
val opCode1 = { array: MutableList<Int> , a: Int, b: Int, resultPostion: Int  ->
   array[resultPostion] = a + b
}
val opCode2 = { array: MutableList<Int> , a: Int, b: Int, resultPostion: Int  ->
    array[resultPostion] = a * b
}

val opcoMap = hashMapOf<Int, (MutableList<Int>, Int, Int, Int) -> Unit>(
    1 to opCode1,
    2 to opCode2
)

fun run(input: MutableList<Int>): Int {
    var count = 0;
    while (count < input.size){
        var value = input[count]
        if (value == 99) {
            return input[0]
        }

        val index1 = input[count + 1]
        val index2 = input[count + 2]
        val index3 = input[count + 3]
        opcoMap.get(value)!!.invoke(input, input[index1], input[index2], index3)
        count += nextOpCode
    }
    return input[0]
}

fun main() {
    var input = File("./src/day2/input.txt").readText().split(",").map { s -> s.toInt() }.toMutableList()
    println(run(input))
//    assert(run(mutableListOf(1,0,0,0,99)) == mutableListOf(2,0,0,0,99))
//    assert(run(mutableListOf(2,3,0,3,99)) == mutableListOf(2,3,0,6,99))
//    assert(run(mutableListOf(2,4,4,5,99,0)) == mutableListOf(2,4,4,5,99,9801))
//    assert(run(mutableListOf(1,1,1,4,99,5,6,0,99)) == mutableListOf(30,1,1,4,2,5,6,0,99))
}