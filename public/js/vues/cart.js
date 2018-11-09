
var product = new Vue({
    delimiters: ['v{', '}'],
    el: '#cart',
    data: {
        goods:null,
        goodsCount:1, //商品数量
   
    },
    methods:{
        // 加减商品
        plus:function(goodsname){ 
            if(goodsname['goodscount']>=0){
                goodsname['goodscount']++;
            }
        },
        mins:function(goodsname){
            if(goodsname['goodscount']>1){
                goodsname['goodscount']--;
            }
        },
          // 删除商品
        del:function(id){
    
            let data = {
                // 删除时获取购物车的id
               cartgoodsid : id,
               
            };
            console.log(data);
            axios.get('/delcart?id='+id)
            .then((res)=>{
                console.log(res.data);
            })
            
        }

    },
    computed:{
       countprice:function(){
            let sum = 0
            // 循环计算总价
            for(let i=0;i<this.goods.length;i++){
                if(this.goods[i].selected){
                    
                    sum += this.goods[i].gdsku.price * this.goods[i].goodscount
                }
                
            }
            return sum
       }
    },
  
    created: function () {
        this.goods = goods;

        
        console.log(this.goods);
        // this.skus = goodsAll.goodsku


    },


});