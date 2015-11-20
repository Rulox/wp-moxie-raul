import React from '../build/react'
import ReactDOM from '../build/react-dom'


export default class MovieList extends React.Component{

    render() {
        return (
            <div>TEST</div>
        )
    }
}


ReactDOM.render(
    <MovieList />
    document.getElementById('content')
)