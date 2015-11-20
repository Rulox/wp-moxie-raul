


//import React from 'build/react'
//import reactDOM from 'build/react-dom'

//import MovieList from './components/MovieList'
/*

$(document).ready(() => {
    $("div[data-react-component]").each(function(){
        let $this = $(this),
            component_data = $this.data(),
            component_name = $this.data('react-component'),
            component = require(`./components/${component_name}`),
            node_name = $this.data('node')

        delete component_data['reactComponent']
        delete component_data['node']

        Object.keys(component_data).map((node) => {
            if(node.indexOf('node') == 0){
                let node_data = getNodeData(component_data[node])
                component_data[node.replace('node','').capitalizeFirstLetter()] =
                    typeof node_data == 'string'?node_data:node_data[component_data[node]]
                delete component_data[node]
            }
        })

        if(node_name){
            let node = getNodeData(node_name)
            $.extend(component_data, node)
        }

        $this.css('height', '')
        ReactDOM.render(
            React.createElement(component, component_data),
            $this.get(0)
        )
    })
})

function getNodeData(node_name, node_data = global.nodes, convert = true){
    let node_count = node_name.indexOf(',')

    if(node_count == -1){
        let subnodes = node_name.indexOf('.')
        if(subnodes==-1){
            if(convert && Object.prototype.toString.call(
                    node_data[node_name]) === '[object Array]'){
                let object = {}
                object[node_name] = node_data[node_name]
                return object
            }
            return node_data[node_name]
        }
        let node_uri = node_name.split('.')
        return getNodeData(node_name.substring(
            subnodes+1), node_data[node_uri[0]], convert)
    } else {
        let nodes_list = node_name.split(','),
            nodes = {}

        nodes_list.forEach((node) => {
            let real_node_name = node
            node = node.replace('*','')
            let node_data = getNodeData(node, undefined, false)

            if(real_node_name.indexOf('*')==-1){
                let _node = node.split('.')
                nodes[_node[_node.length-1]] = node_data
            } else {
                $.extend(nodes, node_data)
            }
        })

        return nodes
    }
}

String.prototype.capitalizeFirstLetter = function(){
    return this.charAt(0).toLowerCase() + this.slice(1)
}*/