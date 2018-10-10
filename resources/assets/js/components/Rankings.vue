<script>
import { Pie } from 'vue-chartjs';

export default {
   extends: Pie,
   props: ['options'],
   mounted() {
         let uri = 'https://localhost/api/rankings';
         let totals = new Array();
         let rank = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            data.forEach(function(obj) {
                totals.push(obj.total);
                rank.push(obj.rank_id);
            });
            if(data) {
                this.renderChart({
                    labels: rank,
                    datasets: [{
                        label: '# of Completed Missions',
                        backgroundColor: [
                            pattern.draw('line-vertical', 'red'),
                            pattern.draw('weave', 'green'),
                            pattern.draw('zigzag', 'blue'),
                            pattern.draw('zigzag-vertical', 'purple'),
                            pattern.draw('diagonal', 'darkgrey'),
                            pattern.draw('diagonal-right-left', 'lime'),
                            pattern.draw('square', 'yellow'),
                            pattern.draw('circle', 'grey'),
                            pattern.draw('triangle', 'black'),
                            pattern.draw('box', 'darkred'),
                            pattern.draw('triangle-inverted', 'darkblue'),
                            pattern.draw('diamond-box', 'darkgreen'),
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