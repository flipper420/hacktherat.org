<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   props: ['options'],
   mounted() {
         let uri = 'https://localhost/api/users';
         let users = new Array();
         let points = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
                this.renderChart({
                    labels: data.username,
                    datasets: [{
                        label: 'Points',
                        backgroundColor: 'red',                    
                        data: data.points
                    }]
                }, this.options);
        }
        else { 
            console.log('No data');
        }});
    }
}
</script>