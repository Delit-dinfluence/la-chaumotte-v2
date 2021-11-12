describe('Algorithm - Depth First Search', () => {
    it('should perform DFS operation on graph', () => {
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

        let paths = []; let path = [];

        const enterVertexCallback = function (item) {

            if (path.length < matrix.length) {
                path.push(item.currentVertex.getKey());
            }

            if (path.length == matrix.length) {
                let clone = [];
                for (let index = 0; index < path.length; index++) {
                    clone[index] =  path[index];
                }
                paths.push(clone);
            }

        };
        const leaveVertexCallback = function (item) {
            if(item.currentVertex == path[path.length - 1]){
                path.pop();
            }

        };

        // Traverse graphs without callbacks first to check default ones.
        // depthFirstSearch(graph, vertexA);

        // Traverse graph with enterVertex and leaveVertex callbacks.
        depthFirstSearch(graph, matrix[0][0], {
            enterVertex: enterVertexCallback,
            leaveVertex: leaveVertexCallback,
        });

        expect(paths.length).toBe(18);

        expect(paths[0]).toEqual(["A","B","E","G"]);
        expect(paths[1]).toEqual(["A","B","E","H"]);
        expect(paths[2]).toEqual(["A","B","E","I"]);

        expect(paths[3]).toEqual(["A","B","F","G"]);
        expect(paths[4]).toEqual(["A","B","F","H"]);
        expect(paths[5]).toEqual(["A","B","F","I"]);

        expect(paths[6]).toEqual(["A","C","E","G"]);
        expect(paths[7]).toEqual(["A","C","E","H"]);
        expect(paths[8]).toEqual(["A","C","E","I"]);

        expect(paths[9]).toEqual(["A","C","F","G"]);
        expect(paths[10]).toEqual(["A","C","F","H"]);
        expect(paths[11]).toEqual(["A","C","F","I"]);

        expect(paths[12]).toEqual(["A","D","E","G"]);
        expect(paths[13]).toEqual(["A","D","E","H"]);
        expect(paths[14]).toEqual(["A","D","E","I"]);

        expect(paths[15]).toEqual(["A","D","F","G"]);
        expect(paths[16]).toEqual(["A","D","F","H"]);
        expect(paths[17]).toEqual(["A","D","F","I"]);
    });
});