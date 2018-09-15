<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   mounted() {
         let uri = 'https://localhost/api/users';
         let Users = new Array();
         let Points = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            //console.log(data);
            if(data) {
                console.log(data);
                Users = data.username;
                Points = data.points;
                //console.log(Users);
                this.renderChart({
                labels: Users,
                datasets: [{
                    label: 'Points',
                    backgroundColor: '#FC2525',
                    data: Points
                }]
            }, {responsive: true, maintainAspectRatio: false})
        }
        else { 
            console.log('No data');
        }});
    }
}
</script>