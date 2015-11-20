/**
 * Main application file. This file contains the main components for the Movie Plugin application.
 *
 * @author Raul Marrero
 * @version 1.0.0
 */
var MovieList = React.createClass({
    /**
     * This function is automatically called when a ReactJS component is rendered.
     * We will use it to catch the data from our api. URL will be pass when we call
     * the component to render it.
     *
     * Note:
     *      States can be modified in ReactJS (every time the state changes, render() function is called)
     *      Props can't be modified in ReactJS
     */
    getInitialState: function() {
        return {data: [], fetched: false};
    },
    componentDidMount: function() {
        $.ajax({
            url: this.props.url,
            type: 'GET',
            dataType: 'json',
            cache: false,
            success: function(data) {
                this.setState({data: data, fetched: true});
            }.bind(this),
            error: function(xhr, status, err) {
                console.log(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    /**
     * Main render function, it will iterate over the films to render them.
     */
    render: function() {
        if(this.state.data.length==0 && this.state.fetched)  // If we don't have any movie...
            return (
                <div className='alert alert-warning'>Sorry, there aren't any movies available. Try again soon!</div>
            );

        return (
            <div>
                {
                    this.state.data.map((movie) => {
                        return(
                            <div key={movie.id}>
                                <div className="col-sm-12 movie animated fadeIn">
                                    <div className="poster col-sm-4 col-xs-12 thumbnail animated bounceIn">
                                        <img src={movie.poster_url} alt={movie.title}/>
                                    </div>
                                    <div className="description col-sm-8 col-xs-12">
                                        <h1>{movie.title}</h1>
                                        <span className="label label-default">Year: {movie.year}</span>
                                        <p>{movie.rating}/5 <i className="glyphicon glyphicon-star"/></p>
                                        <div dangerouslySetInnerHTML={{__html: movie.short_description}}/>
                                        <div className="movie-divider hidden-xs hidden-sm"></div>
                                    </div>

                                </div>
                            </div>

                        )
                    })
                }
            </div>
        )
    }
});

/**
 * Render Component and pass the URL for the JSON API
 */
ReactDOM.render(
    <MovieList url="./movies/?json=true" />,   // Url for the Ajax Request
    document.getElementById('movie-list')
);
