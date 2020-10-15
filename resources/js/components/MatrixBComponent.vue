<template>
  <table class="matrixBWrapper fm8khm7">
    <tr>
      <td class="matrixB f1ipeskn" style="opacity: 1; transform: translateX(0%) translateY(0px) rotateZ(0deg); transform-origin: left bottom;">
        <div class="matrix f1gjq9tk">
          <div class="leftBracket ft2xw1y"></div>
          <div class="row ftsota9">
            <div class="col">
              <input class="cell fnvluvl" type="text" data-row="0" data-col="0" value="2"
                                    style="font-size: 24px; transform: rotateZ(0deg);"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="0" data-col="1"
                                    value="5"
                                    style="font-size: 24px; transform: rotateZ(0deg);"></div>
          </div>
          <div class="row ftsota9">
            <div class="col"><input class="cell fnvluvl" type="text" data-row="1" data-col="0"
                                    value="6"
                                    style="font-size: 24px; transform: rotateZ(0deg);"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="1" data-col="1"
                                    value="7"
                                    style="font-size: 24px; transform: rotateZ(0deg);"></div>
          </div>
          <div class="row ftsota9">
            <div class="col"><input class="cell fnvluvl" type="text" data-row="2" data-col="0"
                                    value="1"
                                    style="font-size: 24px; transform: rotateZ(0deg);"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="2" data-col="1"
                                    value="8"
                                    style="font-size: 24px; transform: rotateZ(0deg);"></div>
          </div>
          <div class="rightBracket fltbfb1"></div>
        </div>
      </td>
      <td>
        <div class="rowsResizer f11qpndz">
          <div class="decreaseRowB ffnnz8g">-</div>
          <div class="increaseRowB ffnnz8g">+</div>
        </div>
      </td>
    </tr>
    <tr>
      <td class="colsResizerContainer f1mgyl9u">
        <div class="colsResizer f17pqfye">
          <div class="decreaseColB ffnnz8g">-</div>
          <div class="increaseColB ffnnz8g">+</div>
        </div>
      </td>
      <td></td>
    </tr>
  </table>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
