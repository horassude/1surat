const Date_ =  {

    patch: function(date = null) {

        var date = date ? new Date(date) :  new Date()
        
        const type = date.getHours() === 7 ? 'date' : 'date_time'
    
        var day = ('0' + date.getDate()).slice(-2);
        var month = ('0' + (date.getMonth() + 1)).slice(-2);
        var year = date.getFullYear();
    
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
    
        var _date = day + '-' + month + '-' + year
        var _time = hours + ':' + minutes
    
        return type === 'date' ? _date : _date + ' at ' + _time
    
    },

    set_date: function(date) {
        return this.patch(date)
    },

    set_date_time : function(date_time) {
        return this.patch(date_time)
    },

    current: function() {
        return new Date();
    },

}

export { Date_ }