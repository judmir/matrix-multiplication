<template>
  <table class="matrixAWrapper fm8khm7">
    <tr>
      <td>
        <div class="rowsResizer f11qpndz">
          <div class="decreaseRowA ffnnz8g">-</div>
          <div class="increaseRowA ffnnz8g">+</div>
        </div>
      </td>
      <td class="matrixA f1mgyl9u">
        <div class="matrix f1gjq9tk">
          <div class="leftBracket ft2xw1y"></div>
          <div class="row ftsota9">
            <div class="col"><input class="cell fnvluvl" type="text" data-row="0" data-col="0"
                                    value="1" style="font-size: 24px;"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="0" data-col="1"
                                    value="2" style="font-size: 24px;"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="0" data-col="2"
                                    value="1" style="font-size: 24px;"></div>
          </div>
          <div class="row ftsota9">
            <div class="col"><input class="cell fnvluvl" type="text" data-row="1" data-col="0"
                                    value="0" style="font-size: 24px;"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="1" data-col="1"
                                    value="1" style="font-size: 24px;"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="1" data-col="2"
                                    value="0" style="font-size: 24px;"></div>
          </div>
          <div class="row ftsota9">
            <div class="col"><input class="cell fnvluvl" type="text" data-row="2" data-col="0"
                                    value="2" style="font-size: 24px;"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="2" data-col="1"
                                    value="3" style="font-size: 24px;"></div>
            <div class="col"><input class="cell fnvluvl" type="text" data-row="2" data-col="2"
                                    value="4" style="font-size: 24px;"></div>
          </div>
          <div class="rightBracket fltbfb1"></div>
        </div>
      </td>
    </tr>
    <tr>
      <td></td>
      <td class="colsResizerContainer f1mgyl9u">
        <div class="colsResizer f17pqfye">
          <div class="decreaseColA ffnnz8g">-</div>
          <div class="increaseColA ffnnz8g">+</div>
        </div>
      </td>
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
