describe('Algorithm - Breadth First Search', () => {
    it('Should perform BFS operation on a custom graph', () => {
        const graph = new Graph(true);

        let matrix = [
            [
                new GraphVertex('A'),
            ],
            [
                new GraphVertex('B'),
                new GraphVertex('C'),
                new GraphVertex('D')
            ],
            [
                new GraphVertex('E'),
                new GraphVertex('F'),
            ],
            [
                new GraphVertex('G'),
                new GraphVertex('H'),
                new GraphVertex('I'),
            ]
        ];


        for (let index = 0; index < matrix.length; index++) {
            if (matrix[index + 1] != null) {

                for (let current = 0; current < matrix[index].length; current++) {
                    for (let next = 0; next < matrix[index + 1].length; next++) {
                        graph.addEdge(new GraphEdge(matrix[index][current], matrix[index + 1][next]));
                    }
                }

            }
        }

        expect(graph.toString()).toBe('A,B,C,D,E,F,G,H,I');

        // breadthFirstSearch(graph, matrix[0][0]);

        const enterVertexCallback = function (item) {
        };
        const leaveVertexCallback = function (item) {
        };

        // Traverse graph with enterVertex and leaveVertex callbacks.
        breadthFirstSearch(graph, matrix[0][0], {
            enterVertex: enterVertexCallback,
            leaveVertex: leaveVertexCallback,
        });
    })
    ;
});