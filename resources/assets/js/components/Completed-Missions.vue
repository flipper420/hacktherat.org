<script>
import { Pie } from 'vue-chartjs';

export default {
   extends: Pie,
   props: ['options'],
   mounted() {
         let uri = 'https://localhost/api/completed-missions';
         let totals = new Array();
         let category = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            data.forEach(function(obj) {
                totals.push(obj.total);
                category.push(obj.category_id);
            });
            if(data) {
                this.renderChart({
                    labels: category,
                    datasets: [{
                        label: '# of Completed Missions',
                        backgroundColor: [
                            pattern.draw('square', 'red'),
                            pattern.draw('circle', 'green'),
                            pattern.draw('diamond', '#cc65fe'),
                            pattern.draw('square', '#ff6384'),
                            pattern.draw('circle', '#36a2eb'),
                            pattern.draw('diamond', '#cc65fe'),
                            pattern.draw('square', '#ff6384'),
                            pattern.draw('circle', '#36a2eb'),
                            pattern.draw('diamond', '#cc65fe'),
                        ],
                        borderColor: 'rgba(0,0,0,0.5)',
                        borderWidth: 3,                
                        data: totals
                    }]
                }, this.options);
        }
        else { 
            console.log('No data');
        }});
    }
}
</script>