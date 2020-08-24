<template>
  <section class="section">
    <div class="container">
            <div class="field">
              <label class="label">Game started</label>
            </div>
        <div class="table-container">
            <table class="table is-bordered">
              <tbody>
              <tr v-for="row in array">
                <td v-for="value in row">
                  <span v-if="value!=0">{{value}}</span>
                  <span v-if="value==0"></span>
                </td>
              </tr>
              </tbody>
            </table>
        </div>
          </div>
  </section>
</template>

<script>
export default {
  components: {
  },
  data() {
    return {
      array: [
        [1,2,3,4],
        [5,6,7,8],
        [9,10,11,12],
        [13,14,15,0],
      ],
    }
  },
  methods: {
    strtoArray(str){
      let array = str.split(',')
      return array
    },
    chunk(arr, size){
      var chunkedArr = [];
      var noOfChunks = Math.ceil(arr.length/size);

      for(var i=0; i<noOfChunks; i++){
        chunkedArr.push(arr.slice(i*size, (i+1)*size));
      }
      return chunkedArr;
  }
}

}
</script>
<style>
.table-container {
  overflow-x: auto;
}

td {
  width: 25%;
  position: relative;
}
td .content {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: gold;
}
</style>