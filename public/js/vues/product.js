
var product = new Vue({
    delimiters: ['v{', '}'],
    el: '#item',
    data: {

        goodsAll: null, //sku所有数据
        goodspec: [],
        sku_group:[], //属性值组合
        sku:'',   
        curSkuInfo:[],
        skus:[],     
        goodsCount:1, //商品数量
        nostork:0,
    },
    methods: {
        // 点击事件
        dianji:function (k,attr,id){
            // 点击时加入样式
            this.nostork = 0;
            var old = document.querySelector('#val_'+attr['selt']);
            // 移除前一个样式
            old.classList.remove('selected');
          
            attr['selt'] = id;
            var nnew = document.querySelector('#val_'+id);
            nnew.classList.add('selected');

            this.sku_group[k] = id;
            this.sku = this.sku_group.join('-');
            // console.log(this.sku);
            // 匹配数据库中是否有属性值组合
            var re=true;
            for(var i=0;i<this.skus.length;i++){
                if(this.skus[i]['spec_all']==this.sku){
                  this.curSkuInfo =  this.skus[i]; 
                  re = false;
                  this.nostork = this.skus[i]['Stock'];  //判断库存
                  break;
                }
            }

            if(re){
                confirm("暂无库存");
            }
            // console.log(this.curSkuInfo);
        },

        // 加减商品
        plus:function(){
            if(this.goodsCount>=0){
                this.goodsCount++;
            }
        },
        mins:function(){
            if(this.goodsCount>1){
                this.goodsCount--;
            }
        },
        // // 加入购物车
        addToCar:function(){
            if(this.nostork>0){
                let data = {
                    goodsCount:this.goodsCount,
                    // sku:this.sku,
                    sku_id:this.curSkuInfo['id'],
                    goods_id:this.goodsAll.id,
                    // _token:token
                };
                axios.post('/dodetail',data)
                .then((res)=>{
                    console.log(res);
                })
            }
           

        }


    },
    created: function () {
        this.goodsAll = goodsAll;
        this.goodspec = goodsAll.goodspec
        console.log(this.goodspec);
        //  console.log(this.goodsAll);
        this.skus = goodsAll.goodsku

        
        for (var i = 0; i < this.goodspec.length; i++) {           
            this.goodspec[i]['selt'] = this.goodspec[i].vals[0]['id'];
            this.sku_group[i]=this.goodspec[i].vals[0]['id'];
        }
        // 把选中的值组合起来
        this.sku = this.sku_group.join('-');
        for(var i=0;i<=this.skus.length;i++){
            if(this.skus[i]['spec_all']==this.sku){
              this.curSkuInfo =  this.skus[i]; 
              break;
            }
        }

    },




});